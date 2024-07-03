<script setup>
import { reactive } from 'vue'
import { router, Link } from '@inertiajs/vue3'

const form = reactive({
    title: null,
    description: null
})

function store()
{
    router.post('/tags', form)
}
</script>
<template>
    <section>
        <header>
            <h1>Создать тег</h1>
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
                        <button type="submit">Создать тег</button>
                    </div>
                </form>
            </div>
        </article>
    </section>
    <section>
        <footer>
            <div>
                <Link :href="route('tags.index')">Назад</Link>
            </div>
        </footer>
    </section>
</template>