<?php

namespace App\Services;

use App\Models\Area;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\City;
use App\Models\Contact;
use App\Models\Hotspot;
use App\Models\Property;
use App\Models\Reservation;
use App\Models\Specification;
use App\Models\SpecificationCategory;
use App\Models\User;
use App\Repositories\Property\PropertyRepository;
use App\Repositories\Specification\SpecificationRepository;
use App\Repositories\SpecificationCategory\SpecificationCategoryRepository;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class AdminPagesService {

    protected PropertyRepository $propertyRepository;

    protected SpecificationCategoryRepository $specificationCategoryRepository;

    protected SpecificationRepository $specificationRepository;

    public function __construct(
        PropertyRepository $propertyRepository,
        SpecificationCategoryRepository $specificationCategoryRepository,
        SpecificationRepository $specificationRepository
    ) {
        $this->propertyRepository = $propertyRepository;
        $this->specificationCategoryRepository = $specificationCategoryRepository;
        $this->specificationRepository = $specificationRepository;
    }

    public function dashboard() {
        return Inertia::render('Admin/Pages/index');
    }

    public function properties() {
        $properties = Property::select('properties.id',
            DB::raw('"test" as image'),
            'properties.title',
            DB::raw('CONCAT(addresses.street, ", ", addresses.number) as address'),
            'cities.name as city', 'areas.name as area', 'properties.size',
            'properties.number_of_baths', 'properties.number_of_beds',
            'properties.available_from', 'properties.available_to')
            ->join('areas', 'areas.id', '=', 'properties.area_id')
            ->join('cities', 'cities.id', '=', 'areas.city_id')
            ->join('addresses', 'addresses.id', '=', 'properties.address_id')
            ->get();

        foreach ($properties as $property) {
            $property->image = $property->images->first()->path;
            unset($property->images);
        }

        return Inertia::render('Admin/Pages/pages/properties/index', [
            'properties' => $properties,

        ]);
    }

    public function createProperty() {
        $categoryProps = [
            'with' => 'specifications',
        ];
        $categories = $this->specificationCategoryRepository->all($categoryProps);
        $cities = City::with('areas')->get();
        $hotspots = Hotspot::all();
        return Inertia::render('Admin/Pages/pages/properties/create', [
            'specificationCategories' => $categories,
            'cities' => $cities,
            'hotspots' => $hotspots,
        ]);
    }

    public function reservations() {
        $reservations = Reservation::select('reservations.id',
            'properties.title',
            'user.email as user_email', 'user.phone_number as user_phone',
            'reservations.payment_date','reservations.payment_date as payment',
            'reservations.start_date', 'reservations.end_date',
            'reservations.created_at')
            ->join('properties', 'properties.id', '=',
                'reservations.property_id')
            ->join('users as user', 'user.id', '=', 'reservations.user_id')
            ->get();
        return Inertia::render('Admin/Pages/pages/reservations/index',
            [
                'data' => $reservations,
            ]);
    }

    public function editReservation($id) {
        $reservation = Reservation::find($id);
        return Inertia::render('Admin/Pages/pages/reservations/edit',
            [
                'reservation' => $reservation,
            ]);
    }

    public function utilities() {
        $specifications = $this->specificationRepository->all();
        $specifications = Specification::select('specifications.id',
            'specifications.name', 'specifications.icon',
            'specification_categories.name as category',
            'specifications.created_at')
            ->join('specification_categories', 'specification_categories.id',
                '=', 'specifications.specification_category_id')
            ->get();
        return Inertia::render('Admin/Pages/pages/specifications/index', [
            'utilities' => $specifications,
        ]);
    }

    public function createUtility() {
        $specificationCategories = $this->specificationCategoryRepository->all();
        return Inertia::render('Admin/Pages/pages/specifications/create',
            [
                'specificationCategories' => $specificationCategories,
            ]);
    }

    public function users() {
        $users = User::select('users.id', 'users.profile_picture',
            DB::raw("CONCAT(users.first_name,' ',users.last_name) as name"),
            'users.email', 'users.phone_number', 'roles.name as role',
            'users.created_at')
            ->join('roles', 'roles.id', '=', 'users.role_id')
            ->get();
        return Inertia::render('Admin/Pages/pages/users/index', [
            'data' => $users,
        ]);
    }

    public function blog() {
        $blogs = Blog::select('blogs.id', 'blogs.title', 'blogs.content',
            'blogs.image',
            'blog_categories.name as category', 'blogs.created_at')
            ->join('blog_categories', 'blog_categories.id', '=',
                'blogs.blog_category_id')
            ->get();
        return Inertia::render('Admin/Pages/pages/blogs/index',
            [
                'blogs' => $blogs,
            ]);
    }

    public function createBlog() {
        $blogCategories = BlogCategory::all();
        return Inertia::render('Admin/Pages/pages/blogs/create', [
            'blogCategories' => $blogCategories,
        ]);
    }

    public function messages() {
        $messages = Contact::all();
        return Inertia::render('Admin/Pages/pages/messages/index', [
            'messages' => $messages,
        ]);
    }

    public function categories() {
        $categories = SpecificationCategory::select('specification_categories.id',
            'specification_categories.name', 'specification_categories.icon',
            'specification_categories.is_showcase as single_answer',
            'specification_categories.created_at')
            ->get();
        return Inertia::render('Admin/Pages/pages/specification-categories/index',
            [
                'categories' => $categories,
            ]);
    }

    public function createCategory() {
        return Inertia::render('Admin/Pages/pages/specification-categories/create');
    }

    public function areas() {
        $areas = Area::select('areas.id', 'areas.name',
            'cities.name as city_name', 'areas.created_at')
            ->join('cities', 'cities.id', '=', 'areas.city_id')
            ->get();

        return Inertia::render('Admin/Pages/pages/areas/index', [
            'data' => $areas,
        ]);
    }

    public function createArea() {
        $cities = City::all();
        return Inertia::render('Admin/Pages/pages/areas/create', [
            'cities' => $cities,
        ]);
    }

    public function hotspots() {
        $data = Hotspot::all();
        return Inertia::render('Admin/Pages/pages/hotspots/index', [
            'data' => $data,
        ]);
    }

    public function createHotspot() {
        return Inertia::render('Admin/Pages/pages/hotspots/create');
    }

}
