<?php

namespace product\productBundle\Controller;

use product\productBundle\Entity\product;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Product controller.
 *
 */
class productController extends Controller
{
    /**
     * Lists all product entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $products = $em->getRepository('productproductBundle:product')->findAll();

        return $this->render('product/index.html.twig', array(
            'products' => $products,
        ));
    }
    public function indexclientAction()
        {
            $em = $this->getDoctrine()->getManager();

            $products = $em->getRepository('productproductBundle:product')->findAll();

            return $this->render('product/indexclient.html.twig', array(
                'products' => $products,
            ));
        }

    /**
     * Creates a new product entity.
     *
     */
    public function newAction(Request $request)
    {
        $product = new Product();
        $form = $this->createForm('product\productBundle\Form\productType', $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            return $this->redirectToRoute('product_show', array('idP' => $product->getIdp()));
        }

        return $this->render('product/new.html.twig', array(
            'product' => $product,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a product entity.
     *
     */
    public function showAction(product $product)
    {
        $deleteForm = $this->createDeleteForm($product);

        return $this->render('product/show.html.twig', array(
            'product' => $product,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing product entity.
     *
     */
    public function editAction(Request $request, product $product)
    {
        $deleteForm = $this->createDeleteForm($product);
        $editForm = $this->createForm('product\productBundle\Form\productType', $product);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('product_edit', array('idP' => $product->getIdp()));
        }

        return $this->render('product/edit.html.twig', array(
            'product' => $product,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a product entity.
     *
     */
    public function deleteAction(Request $request, product $product)
    {
        $form = $this->createDeleteForm($product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($product);
            $em->flush();
        }

        return $this->redirectToRoute('product_index');
    }

    /**
     * Creates a form to delete a product entity.
     *
     * @param product $product The product entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(product $product)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product_delete', array('idP' => $product->getIdp())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
