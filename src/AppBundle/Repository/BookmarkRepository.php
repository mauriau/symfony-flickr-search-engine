<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Bookmark;
use Doctrine\ORM\EntityRepository;
use FOS\UserBundle\Model\User;

/**
 * BookmarkRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class BookmarkRepository extends EntityRepository
{
    public function findAllBookmarkForUser(User $user)
    {
        return $this->createQueryBuilder('b')
            ->select('b')
            ->where('b.User = :user')
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function add(User $user, $bookmarkname)
    {
        $newBookmark = new Bookmark();
        $newBookmark->setTitle($bookmarkname);
        $newBookmark->setUser($user);
        $newBookmark->setIsActive(true);

        $em = $this->getEntityManager();
        $em->persist($newBookmark);
        $em->flush();
    }

    public function findAllActiveBookmark(User $user)
    {
        return $this->createQueryBuilder('b')
            ->select('b')
            ->where('b.isActive = :active')
            ->andWhere('b.User = :user')
            ->setParameter('active', 1)
            ->setParameter('user', $user)
            ->getQuery()
            ->getResult();
    }

    public function findAllPictureForUser(){

    }
}
