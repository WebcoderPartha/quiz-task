<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link } from '@inertiajs/vue3';
const props = defineProps({
  score: Number,
  results: Array,
  timeTaken: Number
})

// Quiz taken time format
const formatTime = (seconds) => {
  const mins = Math.floor(seconds / 60)
  const secs = seconds % 60
  return `${mins}m ${secs.toString().padStart(2, '0')}s`
}

</script>

<template>
    <Head title="Quiz" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Quiz Result</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <div class="flex flex-col gap-2 bg-green-300 px-4 py-4">
                        <h1 class="text-2xl">Score</h1>
                        <p class="text-xl font-bold mb-4">Your Score: {{ score }}/10</p>
                    </div>
                    <div class="flex flex-col gap-2 bg-slate-300 px-4 py-4">
                        <h1 class="text-2xl">Taken Time</h1>
                        <p class="text-xl font-bold mb-4">Your Score: {{ formatTime(timeTaken) }}</p>
                    </div>
                </div>
               
                

                <div class="grid grid-cols-2 gap-4">
                    <div v-for="(res, index) in results" :key="index" class="mb-4 border-b pb-2 bg-white px-4 py-4">
                        <p class="font-semibold">{{ index + 1 }}. {{ res.question }}</p>
                        <p>
                            Your Answer: <span :class="res.isCorrect ? 'text-green-600' : 'text-red-600'">{{ res.userAnswer || 'None' }} - {{ res.options[res.userAnswer] || 'No answer' }}</span> 
                        </p>
                        <p>
                            Correct Answer: <span class="text-green-700 font-semibold">{{ res.correctAnswer }} - {{ res.options[res.correctAnswer] }}</span>
                        </p>
                    </div>
                </div>
                
            </div>

            <div class="flex flex-row items-center justify-center my-4">
                <Link class="bg-[#4361ee] text-white px-4 py-2 rounded-md" href="/dashboard">Dashboard</Link>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
