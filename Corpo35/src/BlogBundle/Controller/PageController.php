<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use BlogBundle\Entity\Commentaire;
use BlogBundle\Entity\Article;


class PageController extends Controller
{
    /**
     * @Route("/{limit}", name="blog")
     */
    public function indexAction($limit=5)
    {
        $em = $this->getDoctrine()
            ->getEntityManager();
        if ($limit=='all') {
            $limit = null;
        }
        $articles = $em->getRepository('BlogBundle:Article')->findBy([], ['date'=>'DESC'], $limit);
        return $this->render('BlogBundle:Default:article.html.twig', array(
            'articles' => $articles,
            'limit'=> $limit,
        ));
    }

//    /**
//     * @Route("/Articles", name="list_article")
//     */
//    public function ArticleAction()
//    {
//        $em = $this->getDoctrine()->getManager($limit = null, $offset = 3);
//        $listArticles = $em->getRepository('BlogBundle:Article')->findBy(array(), null, $limit, $offset);
//
//        return $this->render('BlogBundle:Default:listArticle.html.twig', array(
//            'listArticles' => $listArticles,
//
//        ));
//    }

    /**
     * @Route("/pageArticle/{id}", name="page_article")
     */
    public function ShowContentArticleAction(Article $id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $article = $em->getRepository('BlogBundle:Article')->findBy($id);

        if (!$article) {
            throw $this->createNotFoundException('Unable to find Blog post.');
        }

        $comments = $em->getRepository('BlogBundle:Commentaire')->findByArticle($id, ['date'=>'DESC']);
           // ->getCommentaires($article->getId());

        return $this->render('BlogBundle:Blog:show.html.twig', array(
            'article' => $article,
            'comments' => $comments
        ));
    }

    /**
     * Creates a new commentaire entity.
     *
     * @Route("/new-comment/{id}", name="new-comment")
     */
    public function NewCommentAction(Article $article, Request $request)
    {
        $commentaire = new Commentaire();
        $commentaire->setArticle($article);

        $form = $this->createForm('BlogBundle\Form\CommentaireType', $commentaire);

        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($commentaire);
            $em->flush($commentaire);

            return $this->redirectToRoute('new-comment', array('id' => $article->getId()));
        }

        $comments = $em->getRepository('BlogBundle:Commentaire')->findByArticle( $article->getId(), ['date'=>'DESC']);


        return $this->render('BlogBundle:Default:newComment.html.twig', array(
            'comments' => $comments,
            'article' => $article,
            'form' => $form->createView(),
        ));
    }
}


