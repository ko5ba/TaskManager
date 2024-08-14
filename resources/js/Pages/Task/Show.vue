<script setup>
import { router, Link } from '@inertiajs/vue3'
import { reactive } from 'vue'

const props = defineProps(['task'])

const formDelete = reactive({})

function destroy()
{
    router.delete(`/tasks/${props.task.id}`, formDelete)
}

const formReady = reactive({})

function storeReady()
{
    router.post(`/tasks-ready/${props.task.id}`, formReady)
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
                    <div>Срок окончания: {{ task.date_deadline }}</div>
                    <div>Время: {{ task.time_deadline }}</div>
                </div>
            </div>
            <div>
                <form @submit.prevent="storeReady">
                    <div>
                        <button type="submit">Задача выполнена</button>
                    </div>
                </form>
            </div>
            <div>
                <form @submit.prevent="destroy">
                    <div>
                        <button type="submit">Удалить задачу</button>
                    </div>
                </form>
            </div>
            <div>
                <Link :href="route('tasks.edit', task.id)">Редактировать задачу</Link>
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