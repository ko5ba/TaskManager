<script setup>
import { reactive, onMounted } from "vue";
import { router, Link } from '@inertiajs/vue3'

const props = defineProps(['tag'])

onMounted(() => {
    form.title = props.tag.title,
    form.description = props.tag.description
})

const form = reactive({
    title: null,
    description: null
})

function update()
{
    router.patch(`/tags/${props.tag.id}`, form)
}
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Редактирование тега</h1>
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
                        <button type="submit">Редактировать</button>
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