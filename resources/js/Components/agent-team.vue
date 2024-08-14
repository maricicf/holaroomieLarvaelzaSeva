<template>
    <div v-if="props.agents" :class="agentsgrid">
        <div  v-for="item in datas" :key="item" class="group text-center">
            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                <img :src="item.image" class="" alt="">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                </div>

                <ul
                    class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 transition-all duration-500 ease-in-out">
                    <li v-for="social in item.social" :key="social" class="inline me-1"><a href=""
                            class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                                :data-feather="social" class="size-4"></i></a></li>
                </ul><!--end icon-->
            </div>

            <div class="content mt-3">
                <router-link :to="{name: 'agent-profile', params: {id: item.id}}"
                    class="text-xl font-medium hover:text-green-600 transition-all duration-500 ease-in-out">{{
                    item.name }}</router-link>
                <p class="text-slate-400">{{ item.type }}</p>
            </div>
        </div>
    </div><!--end grid-->

    <div v-else-if="props.agent" :class="agentsgrid">
        <div  v-for="item in datas.slice(0, 6)" :key="item" class="group text-center">
            <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                <img :src="item.image" class="" alt="">
                <div
                    class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                </div>

                <ul
                    class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 transition-all duration-500 ease-in-out">
                    <li v-for="social in item.social" :key="social" class="inline me-1"><a href=""
                            class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                                :data-feather="social" class="size-4"></i></a></li>
                </ul><!--end icon-->
            </div>

            <div class="content mt-3">
                <router-link :to="{name: 'agent-profile', params: {id: item.id}}"
                    class="text-xl font-medium hover:text-green-600 transition-all duration-500 ease-in-out">{{
                    item.name }}</router-link>
                <p class="text-slate-400">{{ item.type }}</p>
            </div>
        </div>
    </div><!--end grid-->


    <div v-else class="container relative lg:mt-24 mt-16">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 md:text-3xl md:leading-normal text-2xl leading-normal font-semibold">Meet The Agent Team
            </h3>

            <p class="text-slate-400 max-w-xl mx-auto">A great plateform to buy, sell and rent your properties without
                any agent or commisions.</p>
        </div><!--end grid-->

        <div class="grid md:grid-cols-12 grid-cols-1 mt-8 gap-[30px]">
            <div v-for="item in datas.slice(0, 4)" :key="item" class="lg:col-span-3 md:col-span-6">
                <div class="group text-center">
                    <div class="relative inline-block mx-auto size-52 rounded-full overflow-hidden">
                        <img :src="item.image" class="" alt="">
                        <div
                            class="absolute inset-0 bg-gradient-to-b from-transparent to-black size-52 rounded-full opacity-0 group-hover:opacity-100 transition-all duration-500 ease-in-out">
                        </div>

                        <ul
                            class="list-none absolute start-0 end-0 -bottom-20 group-hover:bottom-5 transition-all duration-500 ease-in-out">
                            <li v-for="social in item.social" :key="social" class="inline me-1"><a href=""
                                    class="btn btn-icon btn-sm rounded-full border border-green-600 bg-green-600 hover:border-green-600 hover:bg-green-600 text-white"><i
                                        :data-feather="social" class="size-4"></i></a></li>
                        </ul><!--end icon-->
                    </div>

                    <div class="content mt-3">
                        <router-link :to="{name: 'agent-profile', params: {id: item.id}}"
                            class="text-xl font-medium hover:text-green-600 transition-all duration-500 ease-in-out">{{
                    item.name }}</router-link>
                        <p class="text-slate-400">{{ item.type }}</p>
                    </div>
                </div>
            </div>
        </div><!--end grid-->
    </div><!--end container-->
</template>

<script setup>
import { ref, defineProps } from 'vue';

const props = defineProps({
    agents: {
        type: Boolean,
        required: true
    },
    agent: {
        type: Boolean,
        required: true
    },
    agentsgrid: {
        type: String,
        required: true
    }
})
const datas = ref([
    {
        id: 1,
        image: require('../assets/images/client/04.jpg'),
        name: 'Jack John',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 2,
        image: require('../assets/images/client/05.jpg'),
        name: 'Krista John',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 3,
        image: require('../assets/images/client/06.jpg'),
        name: 'Roger Jackson',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 4,
        image: require('../assets/images/client/07.jpg'),
        name: 'Johnny English',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 5,
        image: require('../assets/images/client/08.jpg'),
        name: 'Johnny English',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 6,
        image: require('../assets/images/client/01.jpg'),
        name: 'Johnny English',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 7,
        image: require('../assets/images/client/02.jpg'),
        name: 'Johnny English',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
    {
        id: 8,
        image: require('../assets/images/client/03.jpg'),
        name: 'Johnny English',
        type: 'Property Broker',
        social: ['facebook', 'instagram', 'linkedin']
    },
])
</script>

<style lang="scss" scoped></style>