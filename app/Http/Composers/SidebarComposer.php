<?php

namespace App\Http\Composers;
 
use Illuminate\View\View;

/**
 * Class SidebarComposer.
 */
class SidebarComposer
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * SidebarComposer constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct()
    {
        $this->userRepository = '';//$userRepository;
    }

    /**
     * @param View $view
     *
     * @return bool|mixed
     */
    public function compose(View $view)
    {
        if (1) {
            $view->with('pending_approval', 1);
        } else {
            $view->with('pending_approval', 0);
        }
    }
}
