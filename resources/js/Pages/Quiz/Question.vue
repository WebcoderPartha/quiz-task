<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm, router } from '@inertiajs/vue3';

import { ref, onMounted } from 'vue'

const props = defineProps({
  questions: Array
})

const timeLeft = ref(600) // 10 minutes in seconds

onMounted(() => {
  const timer = setInterval(() => {
    if (timeLeft.value > 0) {
      timeLeft.value--
    } else {
      clearInterval(timer)
      submitQuiz()
    }
  }, 1000)
})

const form = useForm({
  answers: {}
})

const submitQuiz = () => {
    console.log(form?.answers)
//   form.post('/quiz-result', {
//     onSuccess: () => console.log('Submitted')
//   })
}
</script>

<template>
    <Head title="Quiz" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Quiz</h2>
        </template>

        <div class="py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <h1 class="text-2xl font-bold mb-4">Quiz</h1>
                <div class="mb-4 text-red-600 font-semibold">Time Left: {{ Math.floor(timeLeft / 60) }}:{{ (timeLeft % 60).toString().padStart(2, '0') }}</div>
                <div class="grid grid-cols-2 gap-4">
                    <div v-for="(q, index) in props.questions" :key="q.id" class="mb-6 bg-white px-4 py-2 rounded-md shadow-md">
                        <p class="font-medium mb-2">{{ index + 1 }}. {{ q.question }}</p>
                        <div class="space-y-1">
                            <label v-for="(text, key) in q.options" :key="key" class="block">
                            <input
                                type="radio"
                                :name="'question_' + q.id"
                                :value="key"
                                v-model="form.answers[q.id]"
                                class="mr-2"
                            />
                            {{ key }}. {{ text }}
                            </label>
                        </div>
                    </div>
                </div>
            
               <div class="flex flex-row items-center justify-center">
                    <button @click="submitQuiz" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Submit Quiz
                    </button>
               </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
