<script setup>
import { Head } from '@inertiajs/vue3'
import Layout from '../../Layout/App.vue'
import { Button } from '@/components/ui/button/index'
import ContactsTable from './Partials/ContactsTable.vue';
import { provide } from 'vue';

const props = defineProps({
    contatos: {
        type: Array,
        default: []
    }
})

provide('contatos', props.contatos);

</script>

<template>
    <Layout>
        <Head title="Meus contatos | Agenda de contatos" />
        <div class="flex items-center">
          <h1 class="text-lg font-semibold md:text-2xl">
            Meus contatos
          </h1>
        </div>
        <div class="flex flex-1 items-center justify-center rounded-lg border border-dashed shadow-sm">
            <div class="flex flex-col items-center gap-1 text-center" v-if="!contatos.length">
                <h3 class="text-2xl font-bold tracking-tight">
                    Você ainda não possui nenhum contato cadastrado :c
                </h3>
                <p class="text-sm text-muted-foreground">
                    Você pode adicionar novos contatos a qualquer momento
                </p>
                <Button class="mt-4">
                    Novo contato
                </Button>
            </div>
            <ContactsTable v-else
            />
        </div>
    </Layout>
</template>
