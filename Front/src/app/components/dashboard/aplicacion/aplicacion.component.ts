import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { FormBuilder, FormGroup } from '@angular/forms';

@Component({
  selector: 'app-aplicacion',
  templateUrl: './aplicacion.component.html',
  styleUrls: ['./aplicacion.component.css']
})
export class AplicacionComponent implements OnInit {

  public aplications: any[];
  formAplication: FormGroup;

  constructor(private http: HttpClient, private fb: FormBuilder) { }

  ngOnInit(): void {
    this.iniciarForm();
    this.getAll();
  }

  iniciarForm(){
    this.formAplication = this.fb.group( {
      id: 0,
      user: '',
      name: '',
      lastname: '',
      typeId: '',
      numId: '',
      birthdate: '',
      password:'',


    })
  }

  getAll(){
    this.http.get('http://localhost:8000/api/v1/user/aplications').subscribe(
       (result: any) => {
         this.aplications = result.aplication;
         console.log(this.aplications);
       },
       error => {
         console.log('error to conected');
         console.log(error);
       }
    );
  }

  create(){
    const formData = this.formAplication.getRawValue();
    
    const data = {
      id: formData.id,
      user: formData.user,
      name: formData.name,
      lastname: formData.lastname,
      typeId: formData.typeId,
      numId: formData.numId,
      birthdate: formData.birthdate,
      password: formData.password


    }
    
    console.log("agreagar o mod",data);
    if(data.id != 0)
    {
      this.http.put(`http://localhost:8000/api/v1/user/aplications/${data.id}`, data).subscribe(
        (result: any) => {
          console.log(result)
          this.getAll();
          this.iniciarForm();
        },
        error => {
          console.log('error to conected');
          console.log(error);
        }
      );
    }
    else
    {
        this.http.post('http://localhost:8000/api/v1/user/aplications', data).subscribe(
        (result: any) => {
          console.log(result)
          this.getAll();
          this.iniciarForm();
        },
        error => {
          console.log('error to conected');
          console.log(error);
        }
      );
    }
    
  }

  setAplicacion(aplication: any){
    console.log(aplication);
    this.formAplication = this.fb.group( {
      id:  aplication.id,
      user: aplication.user,
      name: aplication.name,
      lastname: aplication.lastname,
      typeId: aplication.typeId,
      numId: aplication.numId,
      birthdate: aplication.birthdate,
      password: aplication.password

    })
    console.log("esto es form SetAprlicacion",this.formAplication);
  }

  delete(){

    const formData = this.formAplication.getRawValue();

    this.http.delete(`http://localhost:8000/api/v1/user/aplications/${formData.id}`).subscribe(
        (result: any) => {
          console.log(result)
          this.getAll();
          this.iniciarForm();
        },
        error => {
          console.log('error to conected');
          console.log(error);
        }
      );
    console.log(this.formAplication);
  }

  clean(){
    this.iniciarForm();
  }

}
