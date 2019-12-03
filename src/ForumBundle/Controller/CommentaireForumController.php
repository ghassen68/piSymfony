<?php

namespace ForumBundle\Controller;

use EventBundle\Entity\Reservation;
use ForumBundle\Entity\CommentaireForum;
use ForumBundle\Entity\Forum;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Commentaireforum controller.
 *
 */
class CommentaireForumController extends Controller
{
    /**
     * Lists all commentaireForum entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $commentaireForums = $em->getRepository('ForumBundle:CommentaireForum')->findAll();

        return $this->render('commentaireforum/index.html.twig', array(
            'commentaireForums' => $commentaireForums,
        ));
    }

    public function indexAdminAction(Request $request, Forum $forum)
    {
        $em = $this->getDoctrine()->getManager();
        $commentaireForums = $em->getRepository('ForumBundle:CommentaireForum')->findByForum($forum->getId());
        return $this->render('commentaireforum/index_admin.html.twig', array(
            'commentaireForums' => $commentaireForums,
        ));
    }
    /**
     * Creates a new commentaireForum entity.
     *
     */
    public function newAction(Request $request, Forum $forum)
    {

        $commentaireForum = new Commentaireforum();
        $form = $this->createForm('ForumBundle\Form\CommentaireForumType', $commentaireForum);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $commentaireForum->setUser($this->getUser());
            $commentaireForum->setForum($forum);
            $em = $this->getDoctrine()->getManager();
            $em->persist($commentaireForum);
            $em->flush();
            return $this->redirectToRoute('forum_show', array('id' => $forum->getId()));
        }

        return $this->render('commentaireforum/new.html.twig', array(
            'commentaireForum' => $commentaireForum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commentaireForum entity.
     *
     */
    public function showAction(CommentaireForum $commentaireForum)
    {
        $deleteForm = $this->createDeleteForm($commentaireForum);

        return $this->render('commentaireforum/show.html.twig', array(
            'commentaireForum' => $commentaireForum,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commentaireForum entity.
     *
     */
    public function editAction(Request $request, CommentaireForum $commentaireForum)
    {
        $deleteForm = $this->createDeleteForm($commentaireForum);
        $editForm = $this->createForm('ForumBundle\Form\CommentaireForumType', $commentaireForum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('commentaireforum_edit', array('id' => $commentaireForum->getId()));
        }

        return $this->render('commentaireforum/edit.html.twig', array(
            'commentaireForum' => $commentaireForum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commentaireForum entity.
     *
     */
    public function deleteAction(Request $request, CommentaireForum $commentaireForum)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($commentaireForum);
        try {
            $entityManager->flush();
        }catch(\Exception $e)
        {
            var_dump($e->getMessage());die;
        }

        return $this->redirectToRoute('forum_show', array('id' => $commentaireForum->getForum()->getId()));
    }

    /**
     * Creates a form to delete a commentaireForum entity.
     *
     * @param CommentaireForum $commentaireForum The commentaireForum entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CommentaireForum $commentaireForum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commentaireforum_delete', array('id' => $commentaireForum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
