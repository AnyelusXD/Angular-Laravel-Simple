import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
//import { HomeComponent } from './public/home/home.component';
import { LoginComponent } from './public/login/login.component';
import { PublicComponent } from './public/public.component';
import { RegisterComponent } from './public/register/register.component';
import { SecureComponent } from './secure/secure.component';

const routes: Routes = [
  {path: '',
     component: PublicComponent,
     children: [
       //{path: '', component: HomeComponent},
       {path: '', component: LoginComponent},
       {path: 'register', component: RegisterComponent},
       
     ]
  },
  {path: 'secure', component: SecureComponent},
  {path: 'dashboard', loadChildren: () => import('./components/dashboard/dashboard.module').then(x => x.DashboardModule)}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
