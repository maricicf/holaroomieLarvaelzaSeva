<?php

namespace App\Repositories\Page;

interface IPageRepository {

    public function getHomePageData();

    public function getAboutPageData();

    public function getFaqPageData();

    public function getPackagesPageData();

    public function getRentPageData();

    public function getPropertyDetailPageData($id);

    public function getBlogPageData();

    public function getBlogDetailPageData($id);

    public function getContactPageData();

    public function getLoginPageData();

    public function getRegisterPageData();

    public function getRePasswordPageData();

}
