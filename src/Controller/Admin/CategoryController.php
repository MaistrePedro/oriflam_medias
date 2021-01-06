<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Images;
use App\Form\Admin\CategoryType;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/admin/category")
 */
class CategoryController extends AbstractController
{
    /**
     * @Route("/", name="category_index", methods={"GET"})
     */
    public function index(CategoryRepository $categoryRepository): Response
    {
        return $this->render('admin/category/index.html.twig', [
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="category_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger): Response
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $imageFiles = $request->files->get('category');
            $datas = $request->request->get('product');
            $category
                ->setLabel($datas['label'])
                ->setSlug($datas['slug'])
                ->setDescription($datas['description']);
            if ($imageFiles) {
                $images = [];
                foreach ($imageFiles['image'] as $imageFile) {
                    /** @var UploadedFile $imageFile */
                    $image = new Images;
                    $time = time();
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename) . '-' . $time;
                    $newFilename = $safeFilename . '.' . $imageFile->guessExtension();
                    $image
                        ->setName($safeFilename)
                        ->setExtension($imageFile->guessExtension());
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                    $em->persist($image);
                    $category->setImage($image->getName());
                }
            }
            $em->persist($category);
            $em->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('admin/category/new.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="category_show", methods={"GET"})
     */
    public function show(Category $category): Response
    {
        return $this->render('admin/category/show.html.twig', [
            'category' => $category,
        ]);
    }

    /**
     * @Route("/{slug}/edit", name="category_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Category $category, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $imageFiles = $request->files->get('category');
            $datas = $request->request->get('category');
            $category
                ->setLabel($datas['label'])
                ->setSlug($datas['slug'])
                ->setDescription($datas['description']);
            $em->persist($category);
            if ($imageFiles) {
                $oldImage = $category->getImage();
                $em->remove($oldImage);
                $category->setImage(null);
                $images = [];
                foreach ($imageFiles['image'] as $imageFile) {
                    /** @var UploadedFile $imageFile */
                    $image = new Images;
                    $time = time();
                    $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                    $safeFilename = $slugger->slug($originalFilename) . '-' . $time;
                    $newFilename = $safeFilename . '.' . $imageFile->guessExtension();
                    $image
                        ->setName($safeFilename)
                        ->setExtension($imageFile->guessExtension());
                    $imageFile->move(
                        $this->getParameter('images_directory'),
                        $newFilename
                    );
                    $em->persist($image);
                    $category->setImage($image);
                }
            }
            $em->flush();

            return $this->redirectToRoute('category_index');
        }

        return $this->render('admin/category/edit.html.twig', [
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{slug}", name="category_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Category $category): Response
    {
        if ($this->isCsrfTokenValid('delete' . $category->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($category);
            $entityManager->flush();
        }

        return $this->redirectToRoute('category_index');
    }
}
