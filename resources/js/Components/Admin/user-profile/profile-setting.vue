<template>
    <div class="container-fluid relative px-3">
                    <div class="layout-specing">
                        <div class="grid grid-cols-1">
                            <div class="profile-banner relative text-transparent rounded-md shadow dark:shadow-gray-700 overflow-hidden">
                                <input id="pro-banner" name="profile-banner" type="file" class="hidden" @change="loadFile">
                                <div class="relative shrink-0">
                                    <img :src="imageSrc" class="h-80 w-full object-cover" id="profile-banner" alt="">
                                    <div class="absolute inset-0 bg-black/70"></div>
                                    <label class="absolute inset-0 cursor-pointer" for="pro-banner"></label>
                                </div>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-12 grid-cols-1 gap-6 mt-6">
                            <div class="xl:col-span-3 lg:col-span-4 md:col-span-4">
                                <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                                    <div class="profile-pic text-center">
                                        <input id="pro-img" name="profile-image" type="file" class="hidden" @change="loadFile2" />
                                        <div>
                                            <div class="relative h-24 w-24 mx-auto">
                                                <img :src="imageSrc2" class="rounded-full shadow dark:shadow-gray-700 ring-4 ring-slate-50 dark:ring-slate-800" id="profile-image" alt="">
                                                <label class="absolute inset-0 cursor-pointer" for="pro-img"></label>
                                            </div>

                                            <div class="mt-4">
                                                <h5 class="text-lg font-semibold">Calvin Carlo</h5>
                                                <p class="text-slate-400">calvin@hotmail.com</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="xl:col-span-9 lg:col-span-8 md:col-span-8">
                                <div class="grid grid-cols-1 gap-6">
                                    <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                                        <h5 class="text-lg font-semibold mb-4">Personal Detail :</h5>
                                        <form>
                                            <div class="grid lg:grid-cols-2 grid-cols-1 gap-5">
                                                <div>
                                                    <label class="form-label font-medium">First Name : <span class="text-red-600">*</span></label>
                                                    <div class="form-icon relative mt-2">
                                                        <i data-feather="user" class="w-4 h-4 absolute top-3 start-4"></i>
                                                        <input type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="First Name:" id="firstname" name="name" required="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="form-label font-medium">Last Name : <span class="text-red-600">*</span></label>
                                                    <div class="form-icon relative mt-2">
                                                        <i data-feather="user-check" class="w-4 h-4 absolute top-3 start-4"></i>
                                                        <input type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Last Name:" id="lastname" name="name" required="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="form-label font-medium">Your Email : <span class="text-red-600">*</span></label>
                                                    <div class="form-icon relative mt-2">
                                                        <i data-feather="mail" class="w-4 h-4 absolute top-3 start-4"></i>
                                                        <input type="email" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Email" name="email" required="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <label class="form-label font-medium">Occupation : </label>
                                                    <div class="form-icon relative mt-2">
                                                        <i data-feather="bookmark" class="w-4 h-4 absolute top-3 start-4"></i>
                                                        <input name="name" id="occupation" type="text" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Occupation :">
                                                    </div>
                                                </div>
                                            </div><!--end grid-->

                                            <div class="grid grid-cols-1">
                                                <div class="mt-5">
                                                    <label class="form-label font-medium">Description : </label>
                                                    <div class="form-icon relative mt-2">
                                                        <i data-feather="message-circle" class="w-4 h-4 absolute top-3 start-4"></i>
                                                        <textarea name="comments" id="comments" class="form-input ps-11 w-full py-2 px-3 h-28 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Message :"></textarea>
                                                    </div>
                                                </div>
                                            </div><!--end row-->

                                            <input type="submit" id="submit" name="send" class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md mt-5" value="Save Changes">
                                        </form><!--end form-->
                                    </div>

                                    <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                                        <div class="grid lg:grid-cols-2 grid-cols-1 gap-6">
                                            <div>
                                                <h5 class="text-lg font-semibold mb-4">Contact Info :</h5>

                                                <form>
                                                    <div class="grid grid-cols-1 gap-5">
                                                        <div>
                                                            <label class="form-label font-medium">Phone No. :</label>
                                                            <div class="form-icon relative mt-2">
                                                                <i data-feather="phone" class="w-4 h-4 absolute top-3 start-4"></i>
                                                                <input name="number" id="number" type="number" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Phone :">
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label class="form-label font-medium">Website :</label>
                                                            <div class="form-icon relative mt-2">
                                                                <i data-feather="globe" class="w-4 h-4 absolute top-3 start-4"></i>
                                                                <input name="url" id="url" type="url" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Url :">
                                                            </div>
                                                        </div>
                                                    </div><!--end grid-->

                                                    <button class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md mt-5">Add</button>
                                                </form>
                                            </div><!--end col-->

                                            <div>
                                                <h5 class="text-lg font-semibold mb-4">Change password :</h5>
                                                <form>
                                                    <div class="grid grid-cols-1 gap-5">
                                                        <div>
                                                            <label class="form-label font-medium">Old password :</label>
                                                            <div class="form-icon relative mt-2">
                                                                <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                                                <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Old password" required="">
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label class="form-label font-medium">New password :</label>
                                                            <div class="form-icon relative mt-2">
                                                                <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                                                <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="New password" required="">
                                                            </div>
                                                        </div>

                                                        <div>
                                                            <label class="form-label font-medium">Re-type New password :</label>
                                                            <div class="form-icon relative mt-2">
                                                                <i data-feather="key" class="w-4 h-4 absolute top-3 start-4"></i>
                                                                <input type="password" class="form-input ps-12 w-full py-2 px-3 h-10 bg-transparent dark:bg-slate-900 dark:text-slate-200 rounded outline-none border border-gray-200 focus:border-cyan-600 dark:border-gray-800 dark:focus:border-cyan-600 focus:ring-0" placeholder="Re-type New password" required="">
                                                            </div>
                                                        </div>
                                                    </div><!--end grid-->

                                                    <button class="btn bg-cyan-600 hover:bg-cyan-700 border-cyan-600 hover:border-cyan-700 text-white rounded-md mt-5">Save password</button>
                                                </form>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>

                                    <div class="p-6 relative rounded-md shadow dark:shadow-gray-700 bg-white dark:bg-slate-900">
                                        <h5 class="text-lg font-semibold mb-4 text-red-600">Delete Account :</h5>

                                        <p class="text-slate-400 mb-4">Do you want to delete the account? Please press below "Delete" button</p>

                                        <a href="" class="btn bg-red-600 hover:bg-red-700 border-red-600 hover:border-red-700 text-white rounded-md">Delete</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Content -->
                    </div>
                </div><!--end container-->
</template>

<script setup>
import { ref } from 'vue';
import image from '../../assets/images/bg.jpg'
import image3 from '../../assets/images/client/07.jpg';

const imageSrc = ref(image)
const imageSrc2 = ref(image3)
const images = ref('')
const image2 = ref('')

function loadFile(event) {
    images.value = document.getElementById(event.target.name)
    imageSrc.value = URL.createObjectURL(event.target.files[0])
}

function loadFile2(event) {
    image2.value = document.getElementById(event.target.name)
    imageSrc2.value = URL.createObjectURL(event.target.files[0])
}
</script>

<style lang="scss" scoped>

</style>
