import { type Config } from 'tailwindcss'
import theme from 'tailwindcss/defaultTheme'

export default {
    darkMode: ['class'],
    content: [
		'./resources/**/*.blade.php',
		'./{resources,src}/**/*.{ts,vue}',
	],
    theme: {
    	extend: {
    		fontFamily: {
    			sans: [
    				'Poppins',
                    ...theme.fontFamily.sans
                ]
    		},
    		colors: {
    			blue: {
    				'50': '#D7EDFC',
    				'100': '#C4E5FB',
    				'200': '#9ED4F9',
    				'300': '#78C3F6',
    				'400': '#51B2F4',
    				'500': '#2BA1F1',
    				'600': '#0E85D6',
    				'700': '#0B64A1',
    				'800': '#07446D',
    				'900': '#042338',
    				DEFAULT: '#2BA1F1'
    			}
    		},
    		boxShadow: {
    			DEFAULT: '0px 16px 46px -14px rgba(0,0,0,0.1)'
    		},
    		borderRadius: {
    			lg: 'var(--radius)',
    			md: 'calc(var(--radius) - 2px)',
    			sm: 'calc(var(--radius) - 4px)'
    		}
    	}
    },
	plugins: [
        require("tailwindcss-animate")
    ],
} satisfies Config
