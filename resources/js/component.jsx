import { createRoot } from 'react-dom/client';

function MyButton() {
    return (
        <button className="rounded-full bg-black p-3 bg-indigo-600 my-3
            hover:outline outline-offset-3">
            Button HERE!
        </button>
    );
}

function AboutPage() {
    return (
        <>
            <h1 className="font-semibold text-2xl bg-sky-500">About</h1>
            <p>
                App in development by Lucas Roman. Please do not hesitate in
                contact me to know more about my work to <span className="font-semibold italic text-indigo-300">
                    <a href="mailto:lucasroman@gmail.com">
                        lucasroman@gmail.com
                    </a>
                </span>
            </p>
        </>
    );
}

const user = {
    name: 'Hedy Lamarr',
    imageUrl: 'https://i.imgur.com/yXOvdOSs.jpg',
    imageSize: 90,
};

export default function MyApp() {
    return (
        
        <div className="bg-sky-500 rounded-lg p-4 m-4">
            <p>Component 1</p>
            <h1>{user.name}</h1>
            <img className="avatar"
                src={user.imageUrl}
                alt={'Photo of ' + user.name}
                style={{ width: user.imageSize, height: user.imageSize }}
            />
            <h1>This is a React JS component</h1>

            <hr />
            <p>Component 2</p>
            <MyButton />
            
            <hr />
            <p>Component 3</p >
            <AboutPage />
            
        </div>
    );
}

const root = createRoot(document.getElementById('root'));

root.render(<MyApp />);

 
