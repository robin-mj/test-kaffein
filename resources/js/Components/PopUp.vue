<template>
    <div class="fixed z-30 top-0 bottom-0 left-0 right-0 bg-opacity-50 bg-black flex items-center justify-center">

        <div class="bg-white p-12 fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 text-gray-900">
            <i @click="cancel" class="absolute top-2.5 right-3 text-lg text-purple cursor-pointer fas fa-times"></i>
            
            <top-informations :company="companyData" :contact="contact" />

            <bottom-informations :company="companyData" />

            <contact-card :contact="contact" class="mx-auto" />

        </div>

    </div>
</template>

<script>
    import ContactCard from '@/Components/ContactCard'
    import TopInformations from '@/Components/TopInformations'
    import BottomInformations from '@/Components/BottomInformations'

    export default {
        components: {
            ContactCard,
            TopInformations,
            BottomInformations,
            BottomInformations,
        },

        props: ['company', 'contact'],

        data() {
            return {
                companyData: this.company,
            }
        },

        methods: {
            cancel: function() {
              this.$emit('cancel')  
            },
        },
    }
</script>
