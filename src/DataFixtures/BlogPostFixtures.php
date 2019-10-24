<?php

namespace App\DataFixtures;

use App\Entity\BlogPost;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class BlogPostFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // generate 10 posts, for fun
        for ($i = 1; $i<=10;$i++){
            $post = new BlogPost();
            $post->setTitle('Test post '.$i);
            $post->setSlug('Test post '.$i);
            $post->setBody('This is supposed to be blog post #'.$i);
            $manager->persist($post);
        }

        $manager->flush();
    }
}
