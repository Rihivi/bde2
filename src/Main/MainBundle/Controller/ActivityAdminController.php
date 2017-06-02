<?php

namespace Main\MainBundle\Controller;

use Main\MainBundle\Entity\Activity;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Activity controller.
 *
 */
class ActivityAdminController extends Controller
{
    /**
     * Lists all activity entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $activities = $em->getRepository('MainBundle:Activity')->findAll();

        return $this->render('MainBundle:Admin:activity/index.html.twig', array(
            'activities' => $activities,
        ));
    }

    /**
     * Creates a new activity entity.
     *
     */
    public function newAction(Request $request)
    {
        $activity = new Activity();
        $form = $this->createForm('Main\MainBundle\Form\ActivityAdminType', $activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($activity);
            $em->flush();

            return $this->redirectToRoute('admin_activity_show', array('id' => $activity->getId()));
        }

        return $this->render('MainBundle:Admin:activity/new.html.twig', array(
            'activity' => $activity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a activity entity.
     *
     */
    public function showAction(Activity $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);

        return $this->render('MainBundle:Admin:activity/show.html.twig', array(
            'activity' => $activity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing activity entity.
     *
     */
    public function editAction(Request $request, Activity $activity)
    {
        $deleteForm = $this->createDeleteForm($activity);
        $editForm = $this->createForm('Main\MainBundle\Form\ActivityAdminType', $activity);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_activity_edit', array('id' => $activity->getId()));
        }

        return $this->render('MainBundle:Admin:activity/edit.html.twig', array(
            'activity' => $activity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a activity entity.
     *
     */
    public function deleteAction(Request $request, Activity $activity)
    {
        $form = $this->createDeleteForm($activity);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($activity);
            $em->flush();
        }

        return $this->redirectToRoute('admin_activity_index');
    }

    /**
     * Creates a form to delete a activity entity.
     *
     * @param Activity $activity The activity entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Activity $activity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_activity_delete', array('id' => $activity->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
