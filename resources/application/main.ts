import {createHead} from '@unhead/vue/client'
import {initializeHybridly} from 'virtual:hybridly/config'

initializeHybridly({
    enhanceVue: (vue) => {
        const head = createHead()
        // head.push({titleTemplate: (title: string) => title ? `${title} - Refuel` : 'Refuel'})
        head.push({title: 'refuel'})
        vue.use(head)
    }
}).then(r => {
})
