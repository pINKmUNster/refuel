import {createHead} from '@unhead/vue/client'
import {initializeHybridly} from 'virtual:hybridly/config'
import './tailwind.css'


initializeHybridly({
    enhanceVue: (vue) => {
        const head = createHead()
        // head.push({titleTemplate: (title: string) => title ? `${title} - Refuel` : 'Refuel'})
        head.push({title: 'Refuel'})
        vue.use(head)
    }
}).then(r => {
})
