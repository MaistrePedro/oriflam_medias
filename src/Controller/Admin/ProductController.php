<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use App\Entity\Images;
use App\Form\ProductType;
use App\Repository\CategoryRepository;
use App\Repository\ProductRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

/**
 * @Route("/admin/product")
 */
class ProductController extends AbstractController
{
    /**
     * @Route("/", name="product_index", methods={"GET"})
     */
    public function index(ProductRepository $productRepository): Response
    {
        return $this->render('admin/product/index.html.twig', [
            'products' => $productRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="product_new", methods={"GET","POST"})
     */
    public function new(Request $request, SluggerInterface $slugger, CategoryRepository $categoryRepository): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $imageFiles = $request->files->get('product');
            $datas = $request->request->get('product');
            // \dd($datas);
            $category = $categoryRepository->find($datas['category']);
            $product = new Product;
            $product
                ->setName($datas['name'])
                ->setCost($datas['cost'])
                ->setDescription($datas['description'])
                ->setCategory($category)
                ->setCreatedAt(new DateTime('now'))
                ->setUpdatedAt(new DateTime('now'));
            $features = [];
            if (isset($datas['features'])) {
                foreach ($datas['features'] as $feature) {
                    $features[] = [$feature['category'] => $feature['content']];
                }
            }
            $product->setFeatures($features);

            if ($imageFiles) {
                $images = [];
                foreach ($imageFiles['image'] as $imageFile) {
                    /** @var UploadedFile $imageFile */
                    // \dd($imageFile);
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
                    $product->setImage($image);
                }
                $em->flush();
            }

            return $this->redirectToRoute('product_index');
        }

        return $this->render('admin/product/new.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_show", methods={"GET"})
     */
    public function show(Product $product): Response
    {
        return $this->render('admin/product/show.html.twig', [
            'product' => $product,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="product_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Product $product, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $imageFiles = $request->files->get('product');
            $datas = $request->request->get('product');
            // \dd($datas);
            $category = $categoryRepository->find($datas['category']);
            $product
                ->setName($datas['name'])
                ->setCost($datas['cost'])
                ->setDescription($datas['description'])
                ->setCategory($category)
                ->setCreatedAt(new DateTime('now'))
                ->setUpdatedAt(new DateTime('now'));
            $features = [];
            foreach ($datas['features'] as $feature) {
                $features[] = [$feature['category'] => $feature['content']];
            }
            $product->setFeatures($features);

            if ($imageFiles) {
                $images = [];
                foreach ($imageFiles['images'] as $imageFile) {
                    /** @var UploadedFile $imageFile */
                    // \dd($imageFile);
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
                    $product->setImage($image);
                }
                $em->flush();
            }

            return $this->redirectToRoute('product_index');
        }

        return $this->render('admin/product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="product_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Product $product): Response
    {
        if ($this->isCsrfTokenValid('delete' . $product->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($product);
            $entityManager->flush();
        }

        return $this->redirectToRoute('product_index');
    }
}
