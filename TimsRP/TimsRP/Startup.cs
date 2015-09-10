using Microsoft.Owin;
using Owin;

[assembly: OwinStartupAttribute(typeof(TimsRP.Startup))]
namespace TimsRP
{
    public partial class Startup
    {
        public void Configuration(IAppBuilder app)
        {
            ConfigureAuth(app);
        }
    }
}
