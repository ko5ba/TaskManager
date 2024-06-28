<script setup>
import { router, Link } from '@inertiajs/vue3'
import { reactive, onMounted } from 'vue'

const props = defineProps(['task'])

const form = reactive({
    title: null,
    description: null,
    priority: null,
    deadline: null
})

onMounted(() => {
    form.title = props.task.title
    form.description = props.task.description
    form.priority = props.task.priority
    form.deadline = props.task.deadline
})

function update()
{
    router.patch(`/tasks/${props.task.id}`, form)
}
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Редактировать задачу</h1>
            </div>
        </header>
    </section>
    <section>
        <article>
            <div>
                <form @submit.prevent="update">
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
                        <button type="submit">Редактировать</button>
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