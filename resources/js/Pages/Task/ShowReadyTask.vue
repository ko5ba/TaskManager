<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps(['task', 'formattedDate'])
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Детали выполненой задачи</h1>
            </div>
        </header>
    </section>
    <section>
        <article>
            <div>
                <div v-if="task">
                    <div>Название: {{ task.title }}</div>
                    <div>Описание: {{ task.description }}</div>
                    <div>Приоритет: {{ task.priority }}</div>
                    <div>Крайний срок: {{ task.date_deadline }}</div>
                    <div>Время: {{ task.time_deadline }}</div>
                    <div>Выполнена: {{ formattedDate }}</div>
                </div>
            </div>
        </article>
    </section>
    <section>
        <footer>
            <div>
                <Link :href="route('tasks.index.ready')">Назад к списку выполненных задач</Link>
            </div>
        </footer>
    </section>
</template>