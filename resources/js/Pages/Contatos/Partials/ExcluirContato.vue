<script setup>
import { Button } from '@/components/ui/button'
import {
  Dialog,
  DialogContent,
  DialogFooter,
  DialogHeader,
  DialogTitle,
} from '@/components/ui/dialog'
import { toast } from '@/components/ui/toast'
import { ReloadIcon } from '@radix-icons/vue'
import { inject, ref } from 'vue';

const loading = ref(false)

const confirmarExclusao = async () => {
    try {
        loading.value = true
        await axios.delete(route('contatos.delete', { id: contato.value.id }))

        toast({ title: 'Contato excluído com sucesso!' })

        setTimeout(() => {
            window.location.reload()
        }, 200);
    } catch (error) {
        toast({
            title: 'Erro ao excluir contato',
            description: error.response.data.message,
            variant: 'destructive',
        })
        loading.value = false
    }
}

const isModalDeleteOpen = inject('isModalDeleteOpen')
const contato = inject('contatoSelecionado')
</script>

<template>
    <Dialog v-model:open="isModalDeleteOpen">
        <DialogContent class="sm:max-w-[425px]">
            <DialogHeader>
                <DialogTitle>Excluir contato</DialogTitle>
            </DialogHeader>

            <p>Tem certeza de que deseja excluir o contato <strong>{{ contato.nome }}</strong>?</p>

            <DialogFooter>
                <Button variant="destructive" @click="confirmarExclusao()" :disabled="loading">
                    <ReloadIcon v-if="loading" class="w-4 h-4 mr-2 animate-spin" />
                    {{ loading ? 'Excluindo contato' : 'Confirmar' }}
                </Button>
            </DialogFooter>
        </DialogContent>
    </Dialog>
</template>
