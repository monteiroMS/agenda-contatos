import { toTypedSchema } from '@vee-validate/zod'
import * as z from 'zod'

export const schema = toTypedSchema(z.object({
    nome: z.string({ required_error: 'Campo obrigatório' }).min(3, 'Nome deve ter no mínimo 3 caracteres').max(50, 'Nome deve ter no máximo 50 caracteres'),
    email: z.string({ required_error: 'Campo obrigatório' }).email('E-mail inválido').max(50, 'E-mail deve ter no máximo 50 caracteres'),
    telefone: z.string({ required_error: 'Campo obrigatório' }).regex(/^\(?\d{2}\)?[-.\s]?\d{4,5}[-.\s]?\d{4}$/, 'Telefone inválido'),
    cep: z.string({ required_error: 'Campo obrigatório' }).length(9, 'CEP inválido'),
    logradouro: z.string({ required_error: 'Campo obrigatório' }).min(3, 'Logradouro deve ter no mínimo 3 caracteres').max(50, 'Logradouro deve ter no máximo 50 caracteres'),
    numero: z.string({ required_error: 'Campo obrigatório' }).optional().nullable(),
    complemento: z.string({ required_error: 'Campo obrigatório' }).optional().nullable(),
    bairro: z.string({ required_error: 'Campo obrigatório' }).min(3, 'Bairro deve ter no mínimo 3 caracteres').max(50, 'Bairro deve ter no máximo 50 caracteres'),
    localidade: z.string({ required_error: 'Campo obrigatório' }).min(3, 'Cidade deve ter no mínimo 3 caracteres').max(50, 'Cidade deve ter no máximo 50 caracteres'),
    uf: z.string({ required_error: 'Campo obrigatório' }).length(2, 'Estado deve ter 2 caracteres'),
}))
