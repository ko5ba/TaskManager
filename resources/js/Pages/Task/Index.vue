<script setup>
import { Link } from '@inertiajs/vue3'
const props = defineProps(['tasks']);
</script>
<template>
    <section>
        <header>
            <h1>Задачи</h1>
        </header>
    </section>
    <section>
        <article>
            <div>
                <div v-if="tasks">
                    <div v-for="task in tasks">
                        <div>
                            <Link :href="route('tasks.show', task.id)">{{ task.title }}</Link>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <Link :href="route('tasks.create')">Создать новую задачу</Link>
            </div>
            <div>
                <Link :href="route('home')">Вернуться на главную</Link>
            </div>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>