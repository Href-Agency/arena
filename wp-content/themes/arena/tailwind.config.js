let fontSizes = {};
let spacing = {};
for (let i = 0; i < 200; i++) {
    fontSizes[i] = i + "px";
    spacing[i] = i + "px";
}


module.exports = {
    content: require('fast-glob').sync([
      './*.php',
      './includes/blocks/*.php',
      './includes/lib/*.php',
      './includes/partials/*.php',
      './js/*.js',
      './includes/blocks/**/*.php',
      './template-parts/*.php'
    ]),
    theme: {
        screens: {
            'sm': '600px',
            // => @media (min-width: 420px) { ... }
        
            'md': '831px',
            // => @media (min-width: 830px) { ... }

            'lg': '1025px',
            // => @media (min-width: 1024px) { ... }
        
            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }
        
            '2xl': '1600px',
            // => @media (min-width: 1600px) { ... }
        },
        spacing: spacing,
        fontSize: fontSizes,
        lineHeight: {
            "0.1": "0.1",
            "0.2": "0.2",
            "0.3": "0.3",
            "0.4": "0.4",
            "0.5": "0.5",
            "0.6": "0.6",
            "0.7": "0.7",
            "0.8": "0.8",
            "0.9": "0.9",
            "1": "1",
            "1.1": "1.1",
            "1.2": "1.2",
            "1.3": "1.3",
            "1.4": "1.4",
            "1.5": "1.5",
            "1.6": "1.6",
            "1.7": "1.7",
            "1.8": "1.8",
            "1.9": "1.9",
            "2.0": "2.0"
        },
        extend: { 
            colors: {
                /**
                 * Define colours here, please follow:
                 * https://tailwindcss.com/docs/customizing-colors#adding-additional-colors
                 */
                grey: {
                    50: '#B9B9B9',
                    100: '#9A9A9A',
                    200: '#6A6A6A'
                },
                blue: {
                    100: '#06A4DE',
                    200: '#1A2E3B',
                    300: '#1F282E'
                },
                brown: {
                    50: '#fdf8f6',
                    100: '#f2e8e5',
                    200: '#eaddd7',
                    300: '#e0cec7',
                    400: '#d2bab0',
                    500: '#bfa094',
                    600: '#a18072',
                    700: '#977669',
                    800: '#846358',
                    900: '#43302b',
                  },
            },
            fontFamily: {
                monaco: ['Monaco', 'sans-serif']
            }
        },
       
    },
    variants: {},
    plugins: [],
  }
