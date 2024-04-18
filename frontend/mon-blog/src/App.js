import './App.css';

import React, { useState, useEffect } from 'react';
import axios from 'axios';


function App() {
  const url = "http://localhost:3001/api/v1/articles/all";
  const [data, setData] = useState([]);

  const fetchInfo = () => {
    return axios.get(url, { headers: { "Access-Control-Allow-Origin": "*" } }).then((res) => setData(res.data));
  };

  useEffect(() => {
    fetchInfo();
  }, []);

  return (
    <div className="relative overflow-x-auto shadow-md">
      <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" className="px-6 py-3">
              Product name
            </th>
            <th scope="col" className="px-6 py-3">
              Color
            </th>
            <th scope="col" className="px-6 py-3">
              Category
            </th>
            <th scope="col" className="px-6 py-3">
              Price
            </th>
            <th scope="col" className="px-6 py-3">
              Action
            </th>
          </tr>
        </thead>
        <tbody>
        {console.log(data.results)}
        
        </tbody>

      </table>
    </div >
  );
}

export default App;
