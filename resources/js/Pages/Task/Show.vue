<script setup>
import { router, Link } from '@inertiajs/vue3'
import { reactive } from 'vue'

const props = defineProps(['task'])

const form = reactive({})

function destroy()
{
    router.delete(`/tasks/${props.task.id}`, form)
}
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Задача</h1>
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
                    <div>Срок окончания: {{ task.deadline }}</div>
                </div>
            </div>
            <div>
                <form @submit.prevent="destroy">
                    <div>
                        <button type="submit">Удалить задачу</button>
                    </div>
                </form>
            </div>
            <div>
                <Link :href="route('tasks.edit', task.id)">Редактироват задачу</Link>
            </div>
            <div>
                <Link :href="route('tasks.index')">Вернуться к списку</Link>
            </div>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>