<?php

namespace product\productBundle\Controller;

use product\productBundle\Entity\categorie_P;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorie_p controller.
 *
 */
class categorie_PController extends Controller
{
    /**
     * Lists all categorie_P entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categorie_Ps = $em->getRepository('productproductBundle:categorie_P')->findAll();

        return $this->render('categorie_p/index.html.twig', array(
            'categorie_Ps' => $categorie_Ps,
        ));
    }

    /**
     * Creates a new categorie_P entity.
     *
     */
    public function newAction(Request $request)
    {
        $categorie_P = new Categorie_p();
        $form = $this->createForm('product\productBundle\Form\categorie_PType', $categorie_P);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie_P);
            $em->flush();

            return $this->redirectToRoute('categoriep_show', array('id' => $categorie_P->getId()));
        }

        return $this->render('categorie_p/new.html.twig', array(
            'categorie_P' => $categorie_P,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorie_P entity.
     *
     */
    public function showAction(categorie_P $categorie_P)
    {
        $deleteForm = $this->createDeleteForm($categorie_P);

        return $this->render('categorie_p/show.html.twig', array(
            'categorie_P' => $categorie_P,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorie_P entity.
     *
     */
    public function editAction(Request $request, categorie_P $categorie_P)
    {
        $deleteForm = $this->createDeleteForm($categorie_P);
        $editForm = $this->createForm('product\productBundle\Form\categorie_PType', $categorie_P);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoriep_edit', array('id' => $categorie_P->getId()));
        }

        return $this->render('categorie_p/edit.html.twig', array(
            'categorie_P' => $categorie_P,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorie_P entity.
     *
     */
    public function deleteAction(Request $request, categorie_P $categorie_P)
    {
        $form = $this->createDeleteForm($categorie_P);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorie_P);
            $em->flush();
        }

        return $this->redirectToRoute('categoriep_index');
    }

    /**
     * Creates a form to delete a categorie_P entity.
     *
     * @param categorie_P $categorie_P The categorie_P entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(categorie_P $categorie_P)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriep_delete', array('id' => $categorie_P->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
