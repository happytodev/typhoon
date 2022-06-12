module.exports = {
  content: [
    "./resources/views/**/*.blade.php",
    "typhoon::*",
    "vendor/happytodev/typhoon/resources/views/**/*.blade.php",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
  safelist: [
    'text-amber-300',
    'text-blue-300',
    'text-green-300',
    'text-indigo-300',
    'text-lime-300',
    'text-orange-300',
    'text-yellow-300',
    'bg-amber-100',
    'bg-blue-100',
    'bg-green-100',
    'bg-indigo-100',
    'bg-lime-100',
    'bg-orange-100',
    'bg-yellow-100',
  ]
}
