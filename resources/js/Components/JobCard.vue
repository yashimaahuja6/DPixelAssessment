<script setup>
import { Briefcase, MapPin, IndianRupee } from 'lucide-vue-next';
import dayjs from 'dayjs';
import relativeTime from 'dayjs/plugin/relativeTime';

// Enable relative time plugin
dayjs.extend(relativeTime);

defineProps({
    job: Object,
});
</script>

<template>
    <div class="bg-white shadow-lg rounded-lg overflow-hidden p-5 border flex flex-col justify-between px-4 md:px-8 lg:px-16">
        <!-- Job Header (Title & Extras) -->
        <div class="flex justify-between items-start">
            <div class="flex items-center space-x-4">
                <!-- Company Logo -->
                <img v-if="job.company?.logo" :src="`/storage/${job.company.logo}`" alt="Company Logo" class="w-12 h-12 rounded-full">
                
                <div>
                    <h2 class="text-lg font-semibold">{{ job.title }}</h2>
                    <p class="text-gray-600">{{ job.company?.name }}</p>
                </div>
            </div>
            <div v-if="job.extra_info" class="flex flex-wrap gap-2 justify-end">
                <span v-for="(extra, index) in job.extra_info.split(', ')" :key="index" class="inline-block bg-gray-200 text-gray-700 rounded-full px-2 py-0.5 text-xs font-medium">
                    {{ extra }}
                </span>
            </div>
           
        </div>

        <!-- Job Details with Vertical Divider -->
        <div class="mt-3 flex items-center text-gray-700 text-sm space-x-4">
            <div class="flex items-center gap-1">
                <Briefcase class="w-4 h-4 text-gray-500" />
                <span>{{ job.experience }}</span>
            </div>

            <!-- Vertical Line -->
            <div class="h-4 w-px bg-gray-400"></div>

            <div class="flex items-center gap-1">
                <IndianRupee class="w-4 h-4 text-gray-500" />
                <span>{{ job.salary }}</span>
            </div>

            <!-- Vertical Line -->
            <div class="h-4 w-px bg-gray-400"></div>

            <div class="flex items-center gap-1">
                <MapPin class="w-4 h-4 text-gray-500" />
                <span>{{ job.location }}</span>
            </div>
        </div>

        <!-- Job Description (Truncated) -->
        <p class="mt-3 text-gray-600 text-sm truncate">
            {{ job.description.substring(0, 100) }}...
        </p>

        <!-- Skills Section (Separated by dots) -->
        <div class="mt-3 text-gray-700 text-sm">
            <template v-for="(skill, index) in job.skills" :key="skill.id">
                {{ skill.name }} <span v-if="index < job.skills.length - 1" class="text-gray-400"> • </span>
            </template>
        </div>

        <!-- Created At (Right-Aligned at Bottom) -->
        <p class="mt-4 text-xs text-gray-500 text-right">
            {{ dayjs(job.created_at).fromNow() }}
        </p>
    </div>
</template>
