document.addEventListener('DOMContentLoaded',function () {
    
    const candidate = document.getElementById('candidate');
    const employer = document.getElementById('employer');
    const candidateForm = document.getElementById('candidateForm');
    const employerForm = document.getElementById('employerForm');
    const applies = document.getElementById('applies');
    const view = document.getElementById('view');

    candidate.addEventListener
    ('click',function()
        {
            if (candidateForm.classList.contains('hidden')) 
                {
                candidateForm.classList.add('visible');
                employerForm.classList.remove('visible');
                employer.classList.remove('bg-white')
                employer.classList.add('bg-info')
                candidate.classList.remove('bg-info')
                candidate.classList.add('bg-white')
                }  
        }
    )


    employer.addEventListener
    ('click',function(){

        if (employerForm.classList.contains('hidden')) 
            {
            employerForm.classList.add('visible');
            candidateForm.classList.remove('visible');
            employer.classList.remove('bg-info')
            employer.classList.add('bg-white')
            candidate.classList.add('bg-info')
            candidate.classList.remove('bg-white')
            
            }  

    })


    // view.addEventListener('click',function(){
    //     if (applies.classList.contains('hidden')) {

    //         view.textContent = 'view';
    //         applies.classList.remove('hidden');
    //         applies.classList.add('visible');
            
    //     }
    //     if (applies.classList.contains('visible')) {

    //         view.textContent = 'hide';
    //         applies.classList.remove('visible');
    //         applies.classList.add('hidden');
            
    //     }
    // })
})