<script setup>
import { router, Link } from '@inertiajs/vue3'
import { reactive } from 'vue'

const form = reactive({
    title: null,
    description: null,
    priority: null,
    deadline: null,
})

function store()
{
    router.post('/tasks', form);
}
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Создать задачу</h1>
            </div>
        </header>
    </section>
    <section>
        <article>
            <div>
                <form @submit.prevent="store">
                    <div>
                        <label for="title">Название: </label>
                        <input id="title" type="text" v-model="form.title">
                    </div>
                    <div>
                        <label for="description">Описание: </label>
                        <input id="description" type="text" v-model="form.description">
                    </div>
                    <div>
                        <label for="priority">Приоритет: </label>
                        <input id="priority" type="text" v-model="form.priority">
                    </div>
                    <div>
                        <label for="deadline">Крайний срок: </label>
                        <input id="deadline" type="date" v-model="form.deadline">
                    </div>
                    <div>
                        <button type="submit">Создать задачу</button>
                    </div>
                </form>
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