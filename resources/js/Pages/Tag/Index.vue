<script setup>
import { Link } from '@inertiajs/vue3'
const props = defineProps(['tags'])
</script>
<template>
    <section>
        <header>
            <h1>Список тегов</h1>
        </header>
    </section>
    <section>
        <article>
            <div>
                <div v-if="tags">
                    <div v-for="tag in tags">
                        <div>
                            <Link :href="route('tags.show', tag.id)">{{ tag.title }}</Link>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
    <section>
        <footer>

        </footer>
    </section>
</template>
