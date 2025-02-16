<script setup>
import { Head } from '@inertiajs/vue3'
import Layout from '../../Layout/App.vue'
import TabelaContatos from './Partials/TabelaContatos.vue'
import { provide, ref } from 'vue'
import NovoContato from './Partials/NovoContato/NovoContato.vue'
import { Plus } from 'lucide-vue-next'
import Button from '@/components/ui/button/Button.vue'
import ExcluirContato from './Partials/ExcluirContato.vue'

const props = defineProps({
    contatos: {
        type: Object,
        default: []
    }
})

const isModalNovoContatoOpen = ref(false)
const isModalDeleteOpen = ref(false)
const modalNovoMode = ref('create')
const contatoSelecionado = ref(null)

const openNovoContatoModal = () => {
    modalNovoMode.value = 'create'
    contatoSelecionado.value = null
    isModalNovoContatoOpen.value = !isModalNovoContatoOpen.value
}

const selectContact = (contato, action) => {
    contatoSelecionado.value = contato
    switch (action) {
        case 'edit':
            modalNovoMode.value = 'edit'
            isModalNovoContatoOpen.value = !isModalNovoContatoOpen.value
            break
        case 'delete':
            isModalDeleteOpen.value = !isModalDeleteOpen.value
            break
    }
}

provide('contatos', props.contatos)
provide('isModalNovoContatoOpen', isModalNovoContatoOpen)
provide('isModalDeleteOpen', isModalDeleteOpen)
provide('modalNovoMode', modalNovoMode)
provide('contatoSelecionado', contatoSelecionado)
provide('selectContact', selectContact)
</script>

<template>
    <Layout>
        <Head title="Meus contatos | Agenda de contatos" />
        <NovoContato />
        <ExcluirContato />
        <div class="flex items-center justify-between">
            <h1 class="text-lg font-semibold md:text-2xl">
                Contatos
            </h1>
            <Button variant="outline" @click="openNovoContatoModal">
                <Plus class="h-4 w-4"/> Novo contato
            </Button>
        </div>
        <div class="flex flex-1 items-center justify-center rounded-lg border border-dashed shadow-sm">
            <div class="flex flex-col items-center gap-1 text-center" v-if="!contatos.data.length">
                <h3 class="text-2xl font-bold tracking-tight">
                    Você ainda não possui nenhum contato cadastrado :c
                </h3>
                <p class="text-sm text-muted-foreground mb-4">
                    Você pode adicionar novos contatos a qualquer momento
                </p>
                <Button variant="outline" @click="openNovoContatoModal">
                    <Plus class="h-4 w-4"/> Novo contato
                </Button>
            </div>
            <TabelaContatos v-else />
        </div>
    </Layout>
</template>
