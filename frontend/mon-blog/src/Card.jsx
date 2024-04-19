import './App.css';
import axios from 'axios';

function Card({ dataObj }) {
    const handleClick = async (event) => {
        event.preventDefault();
        try {
            const response = await axios.delete(`http://127.0.0.1:8000/api/v1/articles/supprimer/${dataObj.id}`);
            console.log('Post successfully deleted:', response.data);
            window.location.reload(true)
        } catch (error) {
            console.error('Error deleting post:', error);
        }
    };

    return (
        <div className="m-5 p-2 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div className="p-2 items-center pb-10">
                <h5 className="text-xl font-medium text-gray-900 dark:text-white">{dataObj.titre}</h5>
                <p className="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">{dataObj.texte}</p>
            </div>
            <div>
                <span className="p-2 text-slate-300 font-xs">Tags: {dataObj.libelle}</span>
            </div>
            <div className="flex justify-between items-center">
                <div>
                    <span className="p-2 text-white font-xs">{dataObj.author_name} {dataObj.author_surname}</span>
                </div>
                <button onClick={handleClick} type="button" className="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-500 dark:hover:bg-red-600 dark:focus:ring-red-900">
                    Supprimer
                </button>
            </div>
        </div>
    );
}

export default Card;
