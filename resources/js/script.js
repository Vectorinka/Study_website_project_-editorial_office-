const form = document.getElementById('registration-form');
const resultDiv = document.getElementById('result');

export function show()
{
    const report = document.getElementById('report').checked;

    if(report)
    {
        document.getElementById('report-theme').style = '';

        return;
    }
    
    document.getElementById('report-theme').style = 'display: none;';

    return;
}
