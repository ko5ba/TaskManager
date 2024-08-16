<script setup>
import { Link } from '@inertiajs/vue3';

const props = defineProps(['tasks', 'countReadyTask']);

</script>
<template>
    <section>
        <header>
            <div>
                <h1>Список готовых задач</h1>
            </div>
        </header>
    </section>
    <section>
        <article>
            <div>
                <div v-if="tasks">
                    <div v-for="task in tasks">
                        <div><Link :href="route('tasks.show.ready', task.id)">{{ task.title }}</Link></div>
                    </div>
                </div>
            </div>
            <div>
                <p>Задач выполнено за сегодня: {{ countReadyTask }}</p>
            </div>
            <div>
                <Link :href="route('home')">Вернуться на главную</Link>
            </div>
        </article>
    </section>
</template>