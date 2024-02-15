import { createRoot } from 'react-dom/client';

function MyButton() {
    return (
            <button>COMPONENT HERE!</button>
    );
}

function AboutPage() {
    return (
        <>
            <h1>About</h1>
            <p>Testing page section to render with ReactJs.</p>
        </>
    );
}

export default function MyApp() {
    return (
        <div class="bg-sky-500 hover:bg-sky-700 text-red-600">
            <h1>Welcome to my app</h1>
            <MyButton />
        </div>
    );
}

const root = createRoot(document.getElementById('root'));

root.render(<MyApp />);

 
