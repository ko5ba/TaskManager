<script setup>
import { router, Link } from '@inertiajs/vue3'
import { reactive } from 'vue';
const props = defineProps(['tag'])

const form = reactive({})

function destroy()
{
    router.delete(`/tags/${props.tag.id}`, form)
}
</script>
<template>
    <section>
        <header>
            <div>
                <h1>Тег</h1>
            </div>
        </header>
    </section>
    <section>
        <article>
            <div>
                <div v-if="tag">
                    <div>{{ tag.title }}</div>
                    <div>{{ tag.description }}</div>
                </div>
            </div>
            <div>
                <form @submit.prevent="destroy">
                    <div>
                        <button type="submit">Удалить тег</button>
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