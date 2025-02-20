<script setup lang="ts">
import { ref, onMounted } from 'vue';
import Hero from '@/Components/Dashboard/Hero.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import axios from 'axios';
import JobCard from '@/Components/JobCard.vue';

const jobs = ref([]);

onMounted(async () => {
    try {
        const response = await axios.get('/admin/api/jobs'); // Fetch directly from Livewire
        console.log("API Response:", response.data); // Debugging: Check API response
        jobs.value = response.data;
    } catch (error) {
        console.error("Error fetching jobs", error);
    }
});
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <Hero />

        <div class="bg-white">
            <div class="container py-5">
                <div class="grid gap-6 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <JobCard v-for="job in jobs" :key="job.id" :job="job" />
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
