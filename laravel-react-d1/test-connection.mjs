import 'dotenv/config';

const API_URL = process.env.D1_API_BASE + '/users';
const API_KEY = process.env.D1_API_KEY;

fetch('https://laravel-react-d1.oukmnut6.workers.dev/users', {
  headers: {
    'X-API-KEY': '8ec3a4c4-5732-4a4d-8bcb-17f16e285b72'
  }
})
  .then(res => res.json())
  .then(data => {
    console.log('✅ Database response:', data);
  })
  .catch(err => {
    console.error('❌ Connection failed:', err.message);
  });
