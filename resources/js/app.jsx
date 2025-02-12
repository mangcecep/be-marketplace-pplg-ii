import { BrowserRouter } from 'react-router-dom'
import './bootstrap'
import App from './pages/App'
import ReactDOM from 'react-dom/client'

ReactDOM.createRoot(document.getElementById("root")).render(
    <BrowserRouter>
        <App />
    </BrowserRouter>
)
