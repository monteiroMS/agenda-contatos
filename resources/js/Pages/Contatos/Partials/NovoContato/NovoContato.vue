<script setup>
import { Button } from '@/components/ui/button'
import {
  Dialog,
  DialogContent,
  DialogDescription,
  DialogFooter,
  DialogHeader,
  DialogTitle,
  DialogTrigger,
} from '@/components/ui/dialog'
import {
  Form,
  FormControl,
  FormField,
  FormItem,
  FormLabel,
  FormMessage,
} from '@/components/ui/form'
import { Input } from '@/components/ui/input'
import { toast } from '@/components/ui/toast'
import { Plus } from 'lucide-vue-next'
import { schema } from './schema'
import axios from 'axios'
import { ref } from 'vue'
import { ReloadIcon } from '@radix-icons/vue'

const loadingCep = ref(false)
const formRef = ref(null)
const loadingSave = ref(false)

const buscaCep = async (cep) => {
    if (cep?.length == 9) {
        loadingCep.value = true
        try {
            const response = await axios.post(route('api.cep.busca'), { cep })
            const { logradouro, bairro, localidade, uf } = response.data
            formRef.value.setFieldValue('logradouro', logradouro)
            formRef.value.setFieldValue('bairro', bairro)
            formRef.value.setFieldValue('localidade', localidade)
            formRef.value.setFieldValue('uf', uf)
        } catch (error) {
            toast({
                title: 'Erro ao buscar CEP',
                description: 'Não foi possível buscar os dados do CEP. Por favor, tente novamente.',
                status: 'error',
            })
        } finally {
            loadingCep.value = false
        }
    }
}

const onSubmit = async (form) => {
    try {
        loadingSave.value = true
        await axios.post(route('contatos.create'), form)
    } catch (error) {
        toast({
            title: 'Erro ao salvar dados do contato',
            description: error.response.data.message,
            status: 'error',
        })
    } finally {
        loadingSave.value = false
    }
}
</script>

<template>
  <Form ref="formRef" v-slot="{ handleSubmit }" as="" keep-values :validation-schema="schema">
    <Dialog>
      <DialogTrigger as-child>
        <Button variant="outline">
            <Plus /> Novo contato
        </Button>
      </DialogTrigger>
      <DialogContent class="sm:max-w-[800px]">
        <DialogHeader>
            <DialogTitle>Criar novo contato</DialogTitle>
            <DialogDescription>
                Aqui você pode adicionar um novo contato. Clique em salvar após preencher os campos abaixo.
            </DialogDescription>
        </DialogHeader>

        <form id="dialogForm" @submit="handleSubmit($event, onSubmit)" class="flex flex-col gap-3">
            <h2 class="text-md font-light text-gray-500">Dados do contato</h2>
            <div class="grid grid-cols-3 gap-4">
                <FormField v-slot="{ componentField }" name="nome">
                    <FormItem>
                        <FormLabel>Nome *</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Nome"
                                v-bind="componentField"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="email">
                    <FormItem>
                        <FormLabel>E-mail *</FormLabel>
                        <FormControl>
                            <Input
                                type="email"
                                placeholder="E-mail"
                                v-bind="componentField"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="telefone">
                <FormItem>
                    <FormLabel>Telefone *</FormLabel>
                    <FormControl>
                        <Input
                            v-bind="componentField"
                            v-mask="['(##) ####-####', '(##) #####-####']"
                            placeholder="Telefone"
                        />
                    </FormControl>
                    <FormMessage />
                </FormItem>
                </FormField>
            </div>

            <h2 class="text-md font-light mt-2 text-gray-500">Endereço</h2>
            <div class="grid grid-cols-3 gap-4">
                <FormField v-slot="{ componentField }" name="cep">
                    <FormItem>
                        <FormLabel>CEP *</FormLabel>
                        <FormControl>
                            <Input
                                v-bind="componentField"
                                v-mask="'#####-###'"
                                placeholder="CEP"
                                @blur="buscaCep(componentField.modelValue)"
                                :disabled="loadingCep"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="logradouro">
                    <FormItem>
                        <FormLabel>Logradouro *</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Logradouro"
                                v-bind="componentField"
                                :disabled="loadingCep"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="numero">
                    <FormItem>
                        <FormLabel>Número</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Número"
                                v-bind="componentField"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>
            </div>

            <div class="grid grid-cols-4 gap-4">
                <FormField v-slot="{ componentField }" name="complemento">
                    <FormItem>
                        <FormLabel>Complemento</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Complemento"
                                v-bind="componentField"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="bairro">
                    <FormItem>
                        <FormLabel>Bairro *</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Bairro"
                                v-bind="componentField"
                                :disabled="loadingCep"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="localidade">
                    <FormItem>
                        <FormLabel>Cidade *</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Cidade"
                                v-bind="componentField"
                                :disabled="loadingCep"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>

                <FormField v-slot="{ componentField }" name="uf">
                    <FormItem>
                        <FormLabel>Estado *</FormLabel>
                        <FormControl>
                            <Input
                                placeholder="Estado"
                                v-bind="componentField"
                                :disabled="loadingCep"
                            />
                        </FormControl>
                        <FormMessage />
                    </FormItem>
                </FormField>
            </div>
        </form>

        <DialogFooter>
          <Button type="submit" form="dialogForm" :disabled="loadingSave">
            <ReloadIcon v-if="loadingSave" class="w-4 h-4 mr-2 animate-spin" />
            {{ loadingSave ? 'Salvando contato' : 'Salvar' }}
          </Button>
        </DialogFooter>
      </DialogContent>
    </Dialog>
  </Form>
</template>
