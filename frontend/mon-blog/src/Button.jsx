import './App.css';

function Delete({index}) {
    return (
        <div class="m-5 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-2 items-center pb-10">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">{dataObj.title}</h5>
                <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">{dataObj.texte}</p>
            </div>
            <div>
                <button>

                </button>
            </div>
        </div>
    );
}


function Add({index}) {
    return (
        <div class="m-5 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-2 items-center pb-10">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">{dataObj.title}</h5>
                <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">{dataObj.texte}</p>
            </div>
            <div>
                <button>

                </button>
            </div>
        </div>
    );
}

function Edit({index}) {
    return (
        <div class="m-5 w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="p-2 items-center pb-10">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">{dataObj.title}</h5>
                <p class="text-sm text-gray-500 dark:text-gray-400 line-clamp-2">{dataObj.texte}</p>
            </div>
            <div>
                <button>

                </button>
            </div>
        </div>
    );
}
