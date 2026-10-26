/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './patterns/**/*.php',
    './templates/**/*.html',
    './parts/**/*.html',
    './assets/js/**/*.js',
    './functions.php'
  ],
  corePlugins: {
    // Preserve existing WordPress base styles & typography defaults
    preflight: false,
  },
  theme: {
    extend: {
      colors: {
        'tf-ink': '#11141a',
        'tf-ink-light': '#2c323d',
        'tf-bg': '#fbfaf7',
        'tf-bg-card': '#ffffff',
        'tf-sand': '#f2eee7',
        'tf-subtle': '#eae5dc',
        'tf-muted': '#5c6773',
        'tf-line': '#e5e0d8',
        'tf-line-light': 'rgba(17, 20, 26, 0.08)',
        'tf-accent': '#b36b43',
        'tf-accent-hover': '#9b5832',
        'tf-accent-soft': '#fbf2ed',
        'tf-blue-soft': '#e2ebf2',
        'tf-white': '#ffffff',
      },
      fontFamily: {
        serif: ['Playfair Display', 'Georgia', 'Times New Roman', 'serif'],
        sans: ['Plus Jakarta Sans', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'sans-serif'],
        mono: ['ui-monospace', 'SFMono-Regular', 'SF Mono', 'Menlo', 'Consolas', 'monospace'],
      },
      maxWidth: {
        'shell': '1400px',
        'content': '820px',
        'page-header': '760px',
      },
      borderRadius: {
        'tf-sm': '8px',
        'tf-md': '16px',
        'tf-lg': '24px',
        'tf-xl': '32px',
        'tf-pill': '9999px',
      },
      boxShadow: {
        'tf-sm': '0 4px 16px -2px rgba(17, 20, 26, 0.04)',
        'tf-md': '0 12px 32px -6px rgba(17, 20, 26, 0.08)',
        'tf-lg': '0 24px 60px -12px rgba(17, 20, 26, 0.14)',
      },
      transitionTimingFunction: {
        'tf-ease': 'cubic-bezier(0.16, 1, 0.3, 1)',
        'tf-drawer': 'cubic-bezier(0.32, 0.72, 0, 1)',
        'tf-bounce': 'cubic-bezier(0.34, 1.56, 0.64, 1)',
      },
    },
  },
  plugins: [],
};
